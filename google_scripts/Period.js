function GetMonthAndDay(periodValuesRange, periodName)
{
  var values = periodValuesRange.getValues();
  
  for (var i = 0; i < periodValuesRange.getNumRows(); i++)
  {
    if (values[i][0] === periodName)
    {
      return {day: values[i][1], month: values[i][2]};
    }
    
  }
  
  return null;
}
