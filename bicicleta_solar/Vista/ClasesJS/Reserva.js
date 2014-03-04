function Reserva(fecha,hinicio,hfinal){
    this.fecha = fecha;
    this.horaInicio = hinicio;
    this.horaFinal = hfinal;

    this.centro;
    this.bici;


    this.addCentro = function(c){
        this.centro = c;
    }
    this.addBici = function(b){
        this.bici = b;
    }
}