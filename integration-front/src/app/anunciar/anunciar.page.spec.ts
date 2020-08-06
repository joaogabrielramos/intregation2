import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { AnunciarPage } from './anunciar.page';

describe('AnunciarPage', () => {
  let component: AnunciarPage;
  let fixture: ComponentFixture<AnunciarPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ AnunciarPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(AnunciarPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
