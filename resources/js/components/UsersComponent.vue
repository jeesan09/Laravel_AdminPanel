<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">Users Component
                               
                               <button  class="btn btn-success" style="float: right;" @click="openModel"  data-target="#myModal" > Add User  
                                         
                                         <i class="fas fa-plus-square"></i>
                                      
                               </button>
                          
                    </div>

                    <div class="card-body table-responsive">
                       
                            <table class="table table-hover  "  >
                              <tbody style="width: 100%;" >
                                <tr>
                         
                                    <th style="width: 14%;">Id</th>
                                    <th style="width: 14%;">Name </th>
                                    <th style="width: 14%;" >Email</th>
                                    <th style="width: 14%;">Type </th>
                                    <th style="width: 14%;">Bio </th>
                                    <th style="width: 14%;">Joiend At </th>
                                
                                    <th style="width: 16%;">Modify</th>


                                </tr>

                    
                              <tr v-for="user in users">
                    
                                <td>{{user.id}}</td>
                                <td>
                               <!--   <div class="progress progress-xs">
                                    <div class="progress-bar bg-warning" style="width: 70%"></div>
                                  </div>  !-->
                                     {{user.name | uppreText}}
                                
                                </td>
                                <td>   <!-- <span class="badge bg-warning">70%</span> !-->
                                    
                                   {{user.email}}
                                </td>
                                <td>
                                    {{user.type | uppreText}}
                                </td>
                                <td>
                                   {{user.bio}}
                                </td>
                         
                                <td>
                                   {{user.created_at | timeFormt}}
                                </td>
                                <td>
                                    <a  @click="editModalOpen(user)">
                                        <i class="fas fa-edit blue"></i>
                                    </a>
                                    <a  @click="deleteUser(user.id)">
                                        <i class="fas fa-trash red"></i>
                                    </a>
                                </td>
                              </tr>
           
                            </tbody>
                        </table>
                       </div>
                    </div>
                </div>
            </div>


<!-- The Modal -->




  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header" >
          <h4 class="modal-title" > {{ modelStatus  ? 'Add New User' : 'Edit User' }} </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->

    <form @submit.prevent="addingMode ? login() : editUser()">   

        <div class="modal-body" >

            
                <div class="form-group">
                  <label>Name</label>
                  <input v-model="form.name" type="text" name="name"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                  <has-error :form="form" field="name"></has-error>
                </div>


                <div class="form-group">
                  <label>Email</label>
                  <input v-model="form.email" type="email" name="email"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                  <has-error :form="form" field="email"></has-error>
                </div>


                <div class="form-group">
                  <label>Password</label>
                  <input v-model="form.password" type="password" name="password"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                  <has-error :form="form" field="password"></has-error>
                </div>


                <div class="form-group">
                  <label >Bio</label>
                  <textarea  v-model="form.bio" type="text" name="bio"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('bio') }"></textarea>

                    <has-error :form="form" field="bio"></has-error>
                </div>



                <div class="form-group">
                  <label for="sel1">Types</label>
                  <select v-model="form.type" type="silect" name="type"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('type') }">
                    <option>kool</option>
                    <option>admin</option>
                    <option>regular</option>
                    <option>poor</option>
                  </select>

                   <has-error :form="form" field="type"></has-error>
                </div>


               

        </div>
    
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
           <button type="submit" v-show="addingMode" class="btn btn-info" >Create</button>
            <button type="submit" v-show="!addingMode"   class="btn btn-info" >Update</button>
        </div>
        
       </form>
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

                      users:{},
                      modelStatus:true,
                      addingMode:true,

                      form: new Form({
                        id:'',
                        name: '',
                        email: '',
                        password:'',
                        type: '',
                        bio: '',
                        photo:''
                      }),

                    }
                    
                  },

              methods: {

                openModel(){

                       this.addingMode=true;
                       this.form.reset();
                      $('#myModal').modal('show');
                          this.form.errors.clear('name');
                          this.form.errors.clear('email');
                          this.form.errors.clear('password');
                          this.form.errors.clear('bio');
                          this.form.errors.clear('type');
                },
                editModalOpen(user){
                    this.addingMode=false;
                    this.form.reset();
                    $('#myModal').modal('show');
                    this.form.fill(user);
                          this.form.errors.clear('name');
                          this.form.errors.clear('email');
                          this.form.errors.clear('password');
                          this.form.errors.clear('bio');
                          this.form.errors.clear('type');
                },
                deleteUser(id){

                            swal({
                              title: 'Are you sure?',
                              text: "You won't be able to revert this!",
                              type: 'warning',
                              showCancelButton: true,
                              confirmButtonColor: '#3085d6',
                              cancelButtonColor: '#d33',
                              confirmButtonText: 'Yes, delete it!'
                            }).then((result) => {
                              if (result.value) {

                                 this.form.delete('api/user/'+id).then(()=>{


                                 this.getAllUsers();
                                    
                                     

                                swal(
                                  'Deleted!',
                                  'Your file has been deleted.',
                                  'success'
                                )

                              
                            
                              }).catch(()=>{


                             })

                              } 
                            })


                },

                getAllUsers(){

                    axios.get("api/user").then(({data})=>(this.users=data.data));

                },

                login () {
                  // Submit the form via a POST request


                   console.log("functon called");
                   this.$Progress.start()

                   this.form.post('api/user').then(()=>
                   {




                   this.getAllUsers();

                   $('#myModal').modal('hide');
                   

                    toast({
                              type: 'success',
                              title: 'User Created successfully'
                         })

                   this.$Progress.finish();



                   })
                   .catch(()=>{


                   })

                  
                },

               editUser(){
               console.log("edditing Data");

               this.$Progress.start()
               this.form.put('api/user/'+this.form.id).then(()=>{


                                swal(
                                  'Updated!',
                                  'Your file has been updated.',
                                  'success'
                                )

                this.getAllUsers();
                $('#myModal').modal('hide');

               }).catch(()=>{

               });
              }



              },


                  
            mounted() {

                 this.getAllUsers();
                  console.log('Component mounted.')
               }
    }
</script>