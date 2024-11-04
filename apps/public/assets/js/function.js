function Processing(text = 'Traitement en cours') {
	document.getElementById("wrapper-body").style.display = "none";
	document.getElementById("Wait").style.display = "block";
	document.getElementById("Intitule").innerText = text;
}

function VerifCasse(evt,type) {
	if ( evt.keyCode != 13 ) {
		switch(type) {
			case "number":
				var accept = "0123456789";
				var txt = "En chiffres uniquement !";
				break;
			case "decimal":
				var accept = "0123456789.-";
				var txt = "Chiffres . et - acceptés !";
				break;
			case "time":
				var accept = "0123456789:";
				var txt = "Heure au format :\n         00:00";
				break;  
			case "phone":
				var accept = "+ 0123456789";
				var txt = "Chiffres, + et espace uniquement !";
				break;  
			case "tarif":
				var accept = " 0123456789,.";
				var txt = "Chiffres, point ou virgule uniquement !";
				break;   
			case "float":
				var accept = "0123456789.";
				var txt = "Chiffres et point uniquement !";
				break;  
		}
		var keyCode = evt.which ? evt.which : evt.keyCode;
		if ( (accept.indexOf(String.fromCharCode(keyCode)) >= 0) ) {
			return true;
		} else {
			alert(txt);
			return false;
		}
	}
}

function sweetAlert(titre, message, url, icon = 'question') {
	const swalWithBootstrapButtons = Swal.mixin({
		customClass: {
			confirmButton: "btn btn-success ml-2",
			cancelButton: "btn btn-danger"
		},
		buttonsStyling: false
	});
	swalWithBootstrapButtons
	.fire({
		title: titre,
		text: message,
		icon: icon,
		showCancelButton: true,
		confirmButtonText: "Je confirme",
		cancelButtonText: "J'annule",
		reverseButtons: true,
		focusConfirm: false,
		focusCancel: false
	})
	.then((result) => {
		if (result.isConfirmed) {
			swalWithBootstrapButtons.fire({
			title: "Confirmation",
			text: "Votre demande est en cours de traitement...",
			icon: "success",
			showConfirmButton: false,
			timer: 2500
			});
			setTimeout(() => { window.location.href = url; }, "2500");
		} else if (
			result.dismiss === Swal.DismissReason.cancel
			) {
				swalWithBootstrapButtons.fire({
				title: "Annulation !",
				text: "Traitement en cours...",
				icon: "error",
				showConfirmButton: false,
				timer: 2000
			});
		}
	});
}

function progress_bar() {
	var speed = 15;
	var items = $('.progress_bar').find('.progress_bar_item');
	
    items.each(function() {
        var item = $(this).find('.progress');
        var itemValue = item.data('progress');
        var i = 0;
        var value = $(this);
		
        var count = setInterval(function(){
            if(i <= itemValue) {
                var iStr = i.toString();
                item.css({
                    'width': iStr+'%'
                });
                value.find('.item_value').html(iStr +' %');
            }
            else {
                clearInterval(count);
            }
            i++;
        },speed);
    });
}

function Show_Password(id) {
	document.getElementById(id).type =  document.getElementById(id).type == 'password' ? 'text' : 'password';
}