import { Component, OnInit } from '@angular/core';
import { SearchService } from '../services/search.service';


@Component({
  selector: 'app-tab1',
  templateUrl: 'tab1.page.html',
  styleUrls: ['tab1.page.scss']
})
export class Tab1Page implements OnInit {

  public republicasArray= [];

  constructor(public searchService: SearchService) {}

  ngOnInit() {
    this.getRepublicas();
  }

    getRepublicas(){
      this.searchService.getListRepublics().subscribe ( (res) => {
        this.republicasArray = res;
      });
    }

    saveRepublic(republica){
      localStorage.setItem('republica',JSON.stringify(republica));
      window.location.replace('/republica');
    }
}

