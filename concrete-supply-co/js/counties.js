/*--------------------------------------------------------------
# Gravity Forms County Field
--------------------------------------------------------------*/
jQuery(document).ready(function($) {
    var stateField = $('#input_1_9');  // FIELD ID FOR STATES (SET VALUE TO STATE CODE)
    var countyField = $('#input_1_10'); // FIELD ID FOR COUNTIES (SET PLACEHOLDER AND NO OPTIONS) 
    var townField = $('#input_1_11');   // FIELD ID FOR TOWNS
    var townbox = $('#field_1_11');

    //FILL COUNTIES BY STATES
    countyField.prop('disabled', true);

    function fetchCounties(state) {
        $.ajax({
            url: stylesheetDir+'/wp-content/themes/concrete-supply-co/inc/gravityforms/us_counties_by_state.json', //URL TO .JSON FILE
            dataType: 'json',
            success: function(data) {
                var counties = data[state];
                if (counties) {
                    countyField.empty();

                    $.each(counties, function(index, county) {
                        countyField.append($('<option>', {
                            value: county,
                            text: county
                        }));
                    });

                    countyField.prop('disabled', false);
                }
            },
            error: function(error) {
                console.error('Error fetching counties:', error);
            }
        });
    }
    
    stateField.change(function() {
        var selectedState = stateField.val();
        if (selectedState) {
            fetchCounties(selectedState);
        } else {
            countyField.empty();
            countyField.prop('disabled', true);
        }
    
    });

    //SHOW TOWNS FOR SELECTED COUNTIES
    townbox.hide();
    countyField.change(function() {
        var selectedCounty = countyField.val();
        
        if (selectedCounty == "Anderson County" || selectedCounty == "Pickens County" || selectedCounty == "Greenville County" || selectedCounty == "Spartanburg County" || selectedCounty == "Cleveland County") {
            townbox.show();
        }else{
            townbox.hide();
        }
    });

     //FILL TWONS BY COUNTIES
     townField.prop('disabled', true);

     function fetchTowns(county) {
        $.ajax({
            url: stylesheetDir+'/wp-content/themes/concrete-supply-co/inc/gravityforms/us_towns_by_county.json', //URL TO .JSON FILE
            dataType: 'json',
            success: function(data) {
                var towns = data[county];
                if (towns) {
                    townField.empty();

                    $.each(towns, function(index, town) {
                        townField.append($('<option>', {
                            value: town,
                            text: town
                        }));
                    });

                    townField.prop('disabled', false);
                }
            },
            error: function(error) {
                console.error('Error fetching towns:', error);
            }
        });
    }

    countyField.change(function() {
        var selectedCounty = countyField.val();
        if (selectedCounty) {
            fetchTowns(selectedCounty);
        } else {
            townField.empty();
            townField.prop('disabled', true);
        }
    
    });
});

