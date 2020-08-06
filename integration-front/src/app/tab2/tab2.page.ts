import { Component, OnInit } from '@angular/core';


@Component({
  selector: 'app-tab2',
  templateUrl: 'tab2.page.html',
  styleUrls: ['tab2.page.scss']
})
export class Tab2Page {

  constructor() {}
  
  Anuncio:any;


  ngOnInit() {
    this.Anuncio = {

      imagem: "../assets/casa1.jpg",
      avatar: "../assets/detective.png",
      titulo: "República UERJ",
      usuario: "José",
      pessoas: 4,
      quartos: 2,
      camas: 4,
      banheiros: 2,
      preco: 150,
      descricao: "These are the days We've been waiting for. On days like these Who could ask for more? Keep on coming 'Cause we're not done yet. These are the days we won't regret. These are the days we won't ever forget." 
    }
  }
}
