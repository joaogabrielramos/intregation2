import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { AnunciarPage } from './anunciar.page';

const routes: Routes = [
  {
    path: '',
    component: AnunciarPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class AnunciarPageRoutingModule {}
