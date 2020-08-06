import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';

import { ComentarioComponent } from '../components/comentario/comentario.component';

import { IonicModule } from '@ionic/angular';

import { RepublicaPageRoutingModule } from './republica-routing.module';

import { RepublicaPage } from './republica.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    RepublicaPageRoutingModule,
    ReactiveFormsModule,
  ],
  declarations: [RepublicaPage, ComentarioComponent]
})
export class RepublicaPageModule {}
