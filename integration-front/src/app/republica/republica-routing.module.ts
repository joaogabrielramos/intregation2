import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { RepublicaPage } from './republica.page';

const routes: Routes = [
  {
    path: '',
    component: RepublicaPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class RepublicaPageRoutingModule {}
