
    $(document).ready(function(){    
       
        startcounter();
		startcounter_pop();
    });
	
	
function startcounter() {		
					if((document.getElementById('hours0'))!=null && (document.getElementById('hours0'))!=null && (document.getElementById('mins0'))!=null && (document.getElementById('sec0'))!=null) {	
					
				if(document.getElementById('days0').innerHTML==0 && document.getElementById('hours0').innerHTML==0 && document.getElementById('mins0').innerHTML==0 && document.getElementById('sec0').innerHTML==0) {
						document.getElementById('days0').innerHTML=0;
						document.getElementById('hours0').innerHTML=0;
						document.getElementById('mins0').innerHTML=0;
						document.getElementById('sec0').innerHTML=0;
				} else {
				
					if(parseInt(document.getElementById('hours0').innerHTML)==0 && parseInt(document.getElementById('mins0').innerHTML)==0 && parseInt(document.getElementById('sec0').innerHTML)==0) {
								  if((parseInt(document.getElementById('days0').innerHTML)-1)<10)
								  {
									  document.getElementById('days0').innerHTML = '0'+(parseInt(document.getElementById('days0').innerHTML)-1);
								  }else{
									  document.getElementById('days0').innerHTML = parseInt(document.getElementById('days0').innerHTML)-1;
								  }
							document.getElementById('hours0').innerHTML = 23;
							document.getElementById('mins0').innerHTML = 59;
							document.getElementById('sec0').innerHTML = 59;
						} 						
						else if(parseInt(document.getElementById('mins0').innerHTML)==0 && parseInt(document.getElementById('sec0').innerHTML)==0) {

								  if((parseInt(document.getElementById('hours0').innerHTML)-1)<10)
								  {
									  document.getElementById('hours0').innerHTML = '0'+(parseInt(document.getElementById('hours0').innerHTML)-1);
								  }else{
									document.getElementById('hours0').innerHTML = parseInt(document.getElementById('hours0').innerHTML)-1;
								  }
							document.getElementById('mins0').innerHTML = 59;
							document.getElementById('sec0').innerHTML = 59;
						}
						else if(parseInt(document.getElementById('sec0').innerHTML)==0) {
								document.getElementById('sec0').innerHTML = 59;
								  if((parseInt(document.getElementById('mins0').innerHTML)-1)<10)
								  {
									  document.getElementById('mins0').innerHTML = '0'+(parseInt(document.getElementById('mins0').innerHTML)-1);
								  }else{
									document.getElementById('mins0').innerHTML = parseInt(document.getElementById('mins0').innerHTML)-1;						
								  }
						} else {
								  if((parseInt(document.getElementById('sec0').innerHTML)-1)<10)
								  {
									  document.getElementById('sec0').innerHTML = '0'+(parseInt(document.getElementById('sec0').innerHTML)-1);
								  }else{
									  document.getElementById('sec0').innerHTML = parseInt(document.getElementById('sec0').innerHTML)-1;
								  }
						}
					}
				}
			setTimeout("startcounter()",1000);
		}
		
		function startcounter_pop() {		
					if((document.getElementById('hours1'))!=null && (document.getElementById('hours1'))!=null && (document.getElementById('mins1'))!=null && (document.getElementById('sec1'))!=null) {	
					
				if(document.getElementById('days1').innerHTML==0 && document.getElementById('hours1').innerHTML==0 && document.getElementById('mins1').innerHTML==0 && document.getElementById('sec1').innerHTML==0) {
						document.getElementById('days1').innerHTML=0;
						document.getElementById('hours1').innerHTML=0;
						document.getElementById('mins1').innerHTML=0;
						document.getElementById('sec1').innerHTML=0;
				} else {
				
					if(parseInt(document.getElementById('hours1').innerHTML)==0 && parseInt(document.getElementById('mins1').innerHTML)==0 && parseInt(document.getElementById('sec1').innerHTML)==0) {
								  if((parseInt(document.getElementById('days1').innerHTML)-1)<10)
								  {
									  document.getElementById('days1').innerHTML = '0'+(parseInt(document.getElementById('days1').innerHTML)-1);
								  }else{
									  document.getElementById('days1').innerHTML = parseInt(document.getElementById('days1').innerHTML)-1;
								  }
							document.getElementById('hours1').innerHTML = 23;
							document.getElementById('mins1').innerHTML = 59;
							document.getElementById('sec1').innerHTML = 59;
						} 						
						else if(parseInt(document.getElementById('mins1').innerHTML)==0 && parseInt(document.getElementById('sec1').innerHTML)==0) {

								  if((parseInt(document.getElementById('hours1').innerHTML)-1)<10)
								  {
									  document.getElementById('hours1').innerHTML = '0'+(parseInt(document.getElementById('hours1').innerHTML)-1);
								  }else{
									document.getElementById('hours1').innerHTML = parseInt(document.getElementById('hours1').innerHTML)-1;
								  }
							document.getElementById('mins1').innerHTML = 59;
							document.getElementById('sec1').innerHTML = 59;
						}
						else if(parseInt(document.getElementById('sec1').innerHTML)==0) {
								document.getElementById('sec1').innerHTML = 59;
								  if((parseInt(document.getElementById('mins1').innerHTML)-1)<10)
								  {
									  document.getElementById('mins1').innerHTML = '0'+(parseInt(document.getElementById('mins1').innerHTML)-1);
								  }else{
									document.getElementById('mins1').innerHTML = parseInt(document.getElementById('mins1').innerHTML)-1;						
								  }
						} else {
								  if((parseInt(document.getElementById('sec1').innerHTML)-1)<10)
								  {
									  document.getElementById('sec1').innerHTML = '0'+(parseInt(document.getElementById('sec1').innerHTML)-1);
								  }else{
									  document.getElementById('sec1').innerHTML = parseInt(document.getElementById('sec1').innerHTML)-1;
								  }
						}
					}
				}
			setTimeout("startcounter_pop()",1000);
		}

