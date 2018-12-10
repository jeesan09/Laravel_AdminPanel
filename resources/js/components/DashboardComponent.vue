<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">DashBoard Component</div>

                    <div class="card-body">
                        <input type="file" class="form-control-file border" @change="getImage">
                    
                        <img :src="imgUrl" height="150px"><br>
                            <button  type="button" class="btn btn-success mt-4" @click="uploadImage" > Uplad Image </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {


             data () {
                    return {
                      // Create a new form instance
                      avater: null,
                      images:'1543825601.png',
                      imgUrl:'',
                      imgname:'',
                      name:'',
                    

                    }
                  },   

            

          methods: {

                 getImage(e){
                  //`http://localhost:8000/img/profile/${images}`
                  //  console.log(e.target.files);
                   var  image = e.target.files[0];
                  //  console.log(image);
                    let reader =  new FileReader();
                    reader.readAsDataURL(image);
                    reader.onload = e =>{
                           
                      //   console.log(e);
                        this.avater=e.target.result;
                    }
     
                 /*   let image = e.target.files[0];
                    this.avater=image;
                    console.log(this.avater);


                   */ 
                //  this.showImage();
              //  console.log(image.name);
                  this.imgname= image.name;
               //  console.log(this.imgname);
    
                 },

                uploadImage(){
                  
                    
                            
                  axios.put(' api/picUpload ', {'imag':this.avater}).then((response) => {
                               
                            this.name = response.data.image
                            //console.log("parse ", JSON.parse(response) )
                              this.imgUrl="http://localhost:8000/img/profile/"+this.name 
                            console.log(this.imgUrl);
                             
                            
                              }).catch(()=>{


                             })
                  //console.log("Funtion Called Image Uplad");  , {'imag':this.avater}
                },

                beforeRouteEnter(to,form,next){

                

                       next(false);
                       console.log("before Route Called");
                       
                  }
                  
                },
       
                mounted() {
                    console.log('Component mounted.')
                   // this.imgUrl="http://localhost:8000/img/profile/"+this.name 
                  //    console.log(this.imgUrl);

                     axios.get("api/picshow").then((response) => {
                               
                            this.name = response.data.image_name
                           // console.log("parse ", JSON.parse(response) )
                            this.imgUrl="http://localhost:8000/img/profile/"+this.name 
                            console.log(this.imgUrl);


                             }).catch(()=>{


                             })
                             


                }
    }
</script>