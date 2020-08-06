import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { CommentService } from '../services/comment.service';
@Component({
  selector: 'app-republica',
  templateUrl: './republica.page.html',
  styleUrls: ['./republica.page.scss'],
})
export class RepublicaPage implements OnInit {
  username = localStorage.getItem('username')
  commentForm: FormGroup;
  editCommentForm: FormGroup;
  editMode = false;
  

  republic = JSON.parse(localStorage.getItem('republica'));
  republic_id = this.republic.id;
  
  commentId:number;
  
  textEdit :String =''
  

  comments = [];

  constructor( public formbuilder: FormBuilder,
    public commentService: CommentService ) { 
    this.commentForm = this.formbuilder.group({
      text: [null, [Validators.required, Validators.maxLength(140)]],
    });
    this.editCommentForm = this.formbuilder.group({
      text: [null, [Validators.required, Validators.maxLength(140)]],
    });
  }

  ngOnInit() {
    this.listComment(this.republic_id);    
  //   this.comments = [{
  //     id: 1,
  //     username: 'Kujo Jotaro',
  //     text: 'Oraoraoraoraoraoraororaoraoraoraoroaroarraoao!'
  //   },
  //   {
  //     id: 2,
  //     username: 'Josuke Higashikata',
  //     text: 'Dorarararararararararararara!'
  //   },
  //   {
  //     id: 3,
  //     username: 'Joseph Joestar',
  //     text: 'Oh my god!!!'
  //   },
  //   {
  //     id: 4,
  //     username: 'Giorno Giovanna',
  //     text: 'Mudamudamudamudamudamudamuda!'
  //   }];
  }

  sendComment(form){
    console.log(form);
    console.log(form.value);
    form.value.republic_id = this.republic_id;
    form.value.username= this.username;
    this.commentService.createComment(form.value).subscribe(
      (res)=>{ 
        alert(res);
        console.log(res);
      }, (err) => { console.log(err);}
    )  
  }

  listComment(republic_id){
  
    this.commentService.showRepublicWithComments(republic_id).subscribe(
      (res)=>{
        console.log(res);
        this.comments=res.comments
      }, (err) =>{ console.log(err);}
    );
  }

  sendEditComment(form){
    form.value.username = this.username
    form.value.republic_id = this.republic_id
    console.log(form);
    console.log(form.value);
    this.editMode = false;
    this.commentService.updateComment(this.commentId,form.value).subscribe(
      (res)=>{
        console.log(res);
        this.textEdit= ''
        
        
    this.listComment(this.republic_id);
      },(err)=>{
        console.log(err);
      }
    )
  }

  
  toggleEdit(id){
    this.commentId = id;
    this.editMode = true;
    console.log(id)
  }

  deleteComment(id){
    this.commentService.deleteComment(id).subscribe(
      (res)=>{
        console.log(res);
        this.listComment(this.republic_id);

      }
    )
    console.log('Mais que cancelado: ' + id);
  }

}