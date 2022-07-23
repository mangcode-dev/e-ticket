const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => { 
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})
var _UrlProject = typeof __u ? `${window.location.origin}/${window.location.pathname.slice(1).split("/")[0]}/` : b64_to_utf8(__u);

var _ConfirmBox = async(option) => {
    return new Promise( (r, j) =>{
        Swal.fire(Object.assign({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
            }, option ))
            .then((result) => { r(result.value);  });  
        } );    
} 
