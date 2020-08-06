import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { ToastController} from '@ionic/angular';

@Component({
  selector: 'app-anunciar',
  templateUrl: './anunciar.page.html',
  styleUrls: ['./anunciar.page.scss'],
})
export class AnunciarPage implements OnInit {

  announceForm: FormGroup;

  constructor(public formbuilder: FormBuilder, public toastController: ToastController) { 
    this.announceForm = this.formbuilder.group({
      name: [null, [Validators.required, Validators.maxLength(100),]],
      address: [null, [Validators.required, Validators.maxLength(70)]],
      district: [null, [Validators.required, Validators.maxLength(30)]],
      city: [null, [Validators.required, Validators.maxLength(30)]],
      description: [null, [Validators.required, Validators.maxLength(140)]],
    });
  }

  async presentToast() {
    const toast = await this.toastController.create({
      message: 'Anuncio criado com sucesso!',
      duration: 2000
    });
    toast.present();
  }

  submitForm(form) {
    console.log(form);
    console.log(form.value);
  }

  ngOnInit() {
  }

}
