var FECHAS = FECHAS || (function(){
    var _args = {}; // private

    return {
        init : function(Args) {
            _args = Args;
        },
        initCalendarios : function() {
        	if (_args[1]) {
				$('#calendarios').multiDatesPicker({
					numberOfMonths: [1,4],
					dateFormat: "dd-mm-yy",
					defaultDate: _args[0],
					minDate: _args[0],
					addDates: _args[1],
					onSelect: function(date, e) {
	            		FECHAS.addRemoveDateRow(date);
	    			}
				});
        	}
        	else {
				$('#calendarios').multiDatesPicker({
					numberOfMonths: [1,4],
					dateFormat: "dd-mm-yy",
					defaultDate: _args[0],
					minDate: _args[0],
					onSelect: function(date, e) {
	            		FECHAS.addRemoveDateRow(date);
	    			}
				});
        	}
        },
        addRemoveDateRow : function(datePicked) {
        	if ($('.fechasData .'+datePicked).length) {
	        	$('.fechasData .'+datePicked).remove();

        		if (!$('.fechasData div').length)
        			$('.fechasData').html('<hr/><font color="red">No hay fechas cargadas.</font>');
        	}
        	else {
        		if (!$('.fechasData div').length)
        			$('.fechasData').html('');

	        	var rowToAdd = ' \
	        		<div class="'+datePicked+'"> \
		        		<hr /> \
				    	<div class="row"> \
				    		<div class="col-md-2">'+datePicked+'<input type="hidden" id="dia" name="dia[]" class="'+datePicked+'" value="'+datePicked+'" /></div> \
				    		<div class="col-md-3"><input type="text" name="precio['+datePicked+']" value="1000" class="col-md-12"></div> \
				    		<div class="col-md-2"><input type="text" name="afip['+datePicked+']" value="0" class="col-md-12"></div> \
				    		<div class="col-md-2"><input type="text" value="0" class="col-md-12" disabled></div> \
				    		<div class="col-md-3"><input type="text" name="cupo['+datePicked+']" value="0" class="col-md-12"></div> \
				    	</div> \
				    </div>';

	        	$('.fechasData').append(rowToAdd);
        	}
        }
    };
}());