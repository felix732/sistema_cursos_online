
    function cerrar(){
swal({
  title: "¿Estas Seguro de Salir?",
  text: "¿Ya te Aseguraste que todo esté en Orden?",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    swal("Listo, tu sesion se ha cerrado", {
      icon: "success",
    });
  } else {
    swal("Perfecto, Volvemos atras");
  }
});
}

