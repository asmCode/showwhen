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
  var sheet = SpreadsheetApp.getActiveSpreadsheet().getSheetByName("Main");
  var namedRanges = sheet.getNamedRanges();
  
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
      var rowIndex = namedRange.getRowIndex();
      var columnIndex = namedRange.getColumnIndex();
      
      var value = sheet.getRange(rowIndex + 1 + movieIndex, columnIndex).getValue();
      
      element[name] = value;
      
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

function onOpen()
{
  var ui = SpreadsheetApp.getUi();
  ui.createMenu('Show When')
      .addItem('Export', 'Export')
      .addToUi();
}
