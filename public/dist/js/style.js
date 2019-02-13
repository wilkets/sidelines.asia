      $('div.alert').delay(3000).slideUp(400);

      var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
      };

      $(document).ready(function(){
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div><input class="form-control categ-field" type="text" name="category[]" placeholder="Category" required> <a href="javascript:void(0);" class="remove_button" title="Remove field"><i class=" glyphicon glyphicon-minus-sign text-yellow"></i></a></div>'; //New input field html
        var x = 1; //Initial field counter is 1
        $(addButton).click(function(){ //Once add button is clicked
            if(x < maxField){ //Check maximum number of input fields
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); // Add field html
            }
        });
        $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
      });

      $('#selectcourse').select2({
        placeholder: 'Select your course',
        tags: 'true'
      });

      $('#selectschool').select2({
        placeholder: 'Choose a school',
        tags: 'true'
      });

      $('#selectskill').select2({
        placeholder: 'Choose a skill',
        tags: 'true'
      });


      $('.form_date').datetimepicker({
          //startDate: "+1d",
          format: "yyyy-mm-dd",
              autoclose: 1,
              startView: 2,
              minView: 2,
              minDate: 0,
              forceParse: 0
        });

      $(function () {
          $("#example1").DataTable();
      });

      $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
