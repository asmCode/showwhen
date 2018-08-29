// Use this function if you want to get folder id.
function LogFolderId()
{
  var folder = DriveApp.getRootFolder();
  folder = folder.getFoldersByName("ShowWhen").next();
  folder = folder.getFoldersByName("MoviesDb").next();
  Logger.log(folder.getId());
}

function Export()
{
  var jsonCode = ExportToJson();
  var phpCode = "<?\n\n$movies_db_json = '\n" + jsonCode + "';\n\n?>";
  
  var file = DriveApp.createFile("movies_db.php", phpCode);
  
  var rootFolder = DriveApp.getRootFolder();
  
  var dstFolderId = "1lL6fBu_TS865c8ZAFLG-2872vOxR4tUA";  // ShowWhen/MoviesDb
  var folder = DriveApp.getFolderById(dstFolderId);
  file.makeCopy(folder);
  rootFolder.removeFile(file);
 
  ShowDownloadDialog(file.getUrl());
}

function ShowDownloadDialog(url)
{
  var ui = UiApp.createApplication().setTitle('Download');
  var p = ui.createVerticalPanel();
  ui.add(p);
  p.add(ui.createAnchor('movies_db.php ',url));
  SpreadsheetApp.getActive().show(ui);
}

function ExportToJson()
{  
  var spreadsheet = SpreadsheetApp.getActiveSpreadsheet();
  var sheet = spreadsheet.getSheetByName("Main");
  var namedRanges = sheet.getNamedRanges();
   
  var hourColumnIndex = spreadsheet.getRangeByName("hour").getColumnIndex();
  var dayColumnIndex = spreadsheet.getRangeByName("day").getColumnIndex();
  var monthColumnIndex = spreadsheet.getRangeByName("month").getColumnIndex();
  var yearColumnIndex = spreadsheet.getRangeByName("year").getColumnIndex();
  
  var elements = new Array();
  
  var moviesDatabase = new Object();
  moviesDatabase["tv_shows"] = elements;
  
  var movieIndex = 0;
  var last_row = false;
  while (!last_row)
  {
    var element = new Object();
    
    for (var i = 0; i < namedRanges.length; i++)
    {
      var namedRange = namedRanges[i].getRange();
      var name = namedRanges[i].getName();
      var columnIndex = namedRange.getColumnIndex();
      var rowIndex = movieIndex + 2;
      
      var value = sheet.getRange(rowIndex, columnIndex).getValue();
      
      element[name] = value;
      
      var timestamp = GetTimeStamp(sheet, rowIndex, hourColumnIndex, dayColumnIndex, monthColumnIndex, yearColumnIndex);
      if (timestamp != 0)
        element["timestamp"] = timestamp;
      
      if (name === "title" && value === "")
      {
        last_row = true;
        break;
      }
    }
        
    if (!last_row)
      elements.push(element);
    
    movieIndex++;
  }
  
  return JSON.stringify(moviesDatabase, null, "\t").replace(/'/g, "\\'");
}

function GetTimeStamp(sheet, rowIndex, hourColumnIndex, dayColumnIndex, monthColumnIndex, yearColumnIndex)
{
  var hour = sheet.getRange(rowIndex, hourColumnIndex).getValue();
  if (typeof hour !== 'number')
    hour = 0;
  
  var day = sheet.getRange(rowIndex, dayColumnIndex).getValue();
  if (typeof day !== 'number')
    return 0;
  
  var month = sheet.getRange(rowIndex, monthColumnIndex).getValue();
  if (typeof month !== 'number')
    return 0;
  
  var year = sheet.getRange(rowIndex, yearColumnIndex).getValue();
  if (typeof year !== 'number')
    return 0;
  
  // PST timezone offset
  var pstOffset = 1000 * 60 * 60 * 8;
  
  var date = new Date(year, month - 1, day, hour);
  return date.valueOf() + pstOffset;
}

function onOpen()
{
  var ui = SpreadsheetApp.getUi();
  ui.createMenu('Show When')
      .addItem('Export', 'Export')
      .addToUi();
}
