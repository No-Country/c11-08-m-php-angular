export interface INewCard {
    nombre:string;
    ubicacion:string;
    puntuacion:number;
    numeroDeOpiniones:string;
    etiquetas:string[];
    parrafo:string;
    precioHora:number;
}

export interface ICard extends INewCard {
    id:number;
}