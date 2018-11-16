//init datepicker, timepicker and modal elements
 M.AutoInit();
var dateElems = document.querySelectorAll('.datepicker');
var dateInstances = M.Datepicker.init(dateElems, {
         format: 'yyyy-mm-dd',
         vibrate: true,
         onClose: function(){ //keep the input updated with actual picker on edit quiz page
              var datePickerInput = document.getElementById("edit_date");
              datePickerInput.value = datePicker.value;
            }
});

var datePicker = document.getElementById("dateP");
        
var dateInstance = M.Datepicker.getInstance(datePicker);
dateInstance.setDate(datePicker.value);
     
var timeElems = document.querySelectorAll('.timepicker');
var timeInstances = M.Timepicker.init(timeElems, {
            twelveHour: true,
            vibrate: true,
            onCloseStart: function(){ //keep the input updated with actual picker on edit quiz page
              var timePickerInput = document.getElementById("edit_time");
              timePickerInput.value = timePicker.value;
            }
});

var timePicker = document.getElementById("timeP");
var timeInstance = M.Timepicker.getInstance(timePicker);
            
var modalElems = document.querySelectorAll('.modal');
var modalInstances = M.Modal.init(modalElems);