<script>
angular.module('ersao', [])
.controller('BranchController', function(BranchService){
	var c = this;

	c.inBranchIndex = '0';
	c.branch = null;

	c.selectBranch = function(){
		c.branch = BranchService.branches[c.inBranchIndex];
	}

	c.selectBranch();

})
.controller('ContactController', function(){
	var c = this;

	c.errors = [];
	c.inName = '';
	c.inEmail = '';
	c.inMessage = '';

	c.isEmpty = function(str){
		return ( /^\s*$/.test(str) );
	}

	c.isEmail = function(str){
		 return ( /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(str) );
	}

	c.checkErrors = function(){
		c.errors = [];

		if ( c.isEmpty(c.inName) ){
			c.errors.push('nameLength');
		}

		if ( c.isEmpty(c.inEmail) ){
			c.errors.push('emailLength');
		}
		else if ( c.isEmail(c.inEmail) == false ){
			c.errors.push('emailFormat');
		}

		if ( c.isEmpty(c.inMessage) ){
			c.errors.push('messageLength');
		}
	}

	c.submit = function($event){
		c.checkErrors();

		if ( c.errors.length != 0 ){
			$event.preventDefault();
			return false;
		}
	}
})
.controller('ReservationController', function(){
	var c = this;

	c.step = 1;

	c.inEventType = '1';
	c.inPartyPackage = '1';
	c.inAddress = '';
	c.inArea = 'manila';
	c.inBranch = '0';
	c.inDate = '';
	c.inDateTimeStart = '9:00';
	c.inDateTimeEnd = '10:00';
	c.inPax = '50';
	c.inName = '';
	c.inEmail = '';
	c.inContact = '';

	c.visBranchName = '';
	c.visBranchAddress = '';
	c.visDate = '';
	c.visTimeStart = '';
	c.visTimeEnd = '';
	c.visEventType = '';

	c.errors = [];


	c.isEmpty = function(str){
		return /^\s*$/.test(str);
	}

	c.isEmail = function(str){
		 return ( /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(str) );
	}

	c.isInteger = function(str){
		var num = parseInt(str);

		if ( isNaN(num) == true ){
			return false;
		}

		return true;
	}

	c.init = function(){
		var date = new Date();

		c.inDate = date.getFullYear() + '-' + (date.getMonth()+1) + '-' + date.getDate();
	}

	c.getEventType = function(){
		c.inEventType = $('input[name=package]:checked').val();
	}

	c.checkCurrentStep = function(){
		c.errors = [];

		if ( c.step == 2 ){
			if ( c.inEventType == 1 ){
				if ( c.isEmpty(c.inAddress) == true ){
					c.errors.push('addressEmpty');
				}
			}
			else if ( c.inEventType == 2){
				if ( c.inBranch == 0 ){
					c.errors.push('branchInvalid');
				}
			}
		}
		else if ( c.step == 3 ){
			if ( c.isEmpty(c.inName) == true ){
				c.errors.push('nameEmpty');
			}

			if ( c.isEmpty(c.inEmail) == true ){
				c.errors.push('emailEmpty');
			}
			else if ( c.isEmail(c.inEmail) == false ){
				c.errors.push('emailFormat');
			}

			if ( c.isEmpty(c.inContact ) == true ){
				c.errors.push('contactEmpty');
			}

			if ( c.inEventType == 2 ){
				if ( c.isEmpty(c.inPax) == true ){
					c.errors.push('paxEmpty');
				}
				else if ( c.isInteger(c.inPax) == false ){
					c.errors.push('paxInvalid');
				}
			}
		}

		if ( c.errors.length != 0 ){
			return false;
		}

		return true;
	}

	c.nextStep = function(){
		c.getEventType();

		if ( c.checkCurrentStep() == false ){
			return false;
		}

		c.step++;

		if ( c.step == 3 && c.inEventType == 1 ){
			c.inPartyPackage =  $('input[name=partypackage]:checked').val();
		}
		else if ( c.step == 4 && c.inEventType == 1 ){
			c.inPax =  $('input[name=pax]:checked').val();

			if ( c.inPax != 50 && c.inPax != 100 ){
				c.inPax = 50;
			}
		}
		else if ( c.step == 4 && c.inEventType == 2 ){
			c.inPax = parseInt(c.inPax);
		}
		else if ( c.step == 5 ){
			c.visDate = c.formatDate();
			c.visTimeStart = c.formatTime(c.inDateTimeStart);
			c.visTimeEnd = c.formatTime(c.inDateTimeEnd);
			c.visBranchName = $('#branch-name').text();
			c.visBranchAddress = $('#branch-address').text();
			c.visEventType = ( c.inEventType == 1 ? 'Party Booth Package' : 'Event Party Package');
		}

	}

	c.formatDate = function(){
		var parts = c.inDate.split('-');
		var year = parts[0];
		var month = parseInt(parts[1]);
		var day = parts[2];
		var monthStr = 'January';

		switch( month ){
			case 1: monthStr = 'January'; break;
			case 2: monthStr = 'Feburary'; break;
			case 3: monthStr = 'March'; break;
			case 4: monthStr = 'April'; break;
			case 5: monthStr = 'May'; break;
			case 6: monthStr = 'June'; break;
			case 7: monthStr = 'July'; break;
			case 8: monthStr = 'August'; break;
			case 9: monthStr = 'September'; break;
			case 10: monthStr = 'October'; break;
			case 11: monthStr = 'November'; break;
			case 12: monthStr = 'December'; break;
		}

		return monthStr + ' ' + day + ', ' + year;
	}

	c.formatTime = function(time){
		var parts = time.split(':');
		var hour = parseInt(parts[0]);
		var minutes = parts[1];
		var suffix = 'AM';

		if ( hour < 12 ){
			suffix = 'AM';

			if ( hour == 0 ){
				hour = 12;
			}
		}
		else{
			suffix = 'PM';

			if ( hour > 12 ){
				hour -= 12;
			}
		}

		return hour + ':' + minutes + ' ' + suffix;

	}

	c.previousStep = function(){
		c.getEventType();
		c.step--;
	}

	c.submit = function(){
		$('#event-form').submit();
	}

	c.init();
})
.factory('BranchService', function(){
	var service = this;
	var json = "<?php echo addslashes(json_encode($ngData)); ?>";

	service.branches = JSON.parse(json).branches;

	return service;
})
</script>
