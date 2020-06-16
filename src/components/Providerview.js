
import React, { Component } from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';
import {Redirect} from 'react-router-dom'; 
import queryString from 'query-string';
 import Axios from 'axios';

class providerprofileview extends Component {
 constructor(props) {
        super(props);
         this.state = {
    posts: [],
    isLoading: true,
      file:null,
    errors: null
  };

      this.onChange = this.onChange.bind(this)
       this.uploadFile = this.uploadFile.bind(this)
 }
     




   makeorder=(event)=>{

       // window.location.reload(false);
       event.preventDefault();
       let res =  this.uploadFile(this.state.file);
       console.log(res.data);
       event.persist();
       Axios.post('http://react.vitruvio.ca/phpreact/makeorder.php',{
         
                   
           id:sessionStorage.getItem('userData'),
       },{

         headers: {
                'content-type': 'multipart/form-data'
            }
  
       })
       .then(function ({data}) {
        

           if(data.success == 1){

               event.target.reset();
               alert(data.msg);
               window.location.reload(false);
                // this.props.history.push("patients");
           }
           else{
               alert(data.msg);
           }
       }.bind(this))
       .catch(function (error) {
       // console.log(error);
       });

   }

 onChange(e) {
        this.setState({file:e.target.files[0]})
    }


 async uploadFile(file){
        

        const formData = new FormData();
        
        formData.append('avatar',file)
        formData.append('user',sessionStorage.getItem('userData'))
        formData.append('provider',queryString.parse(this.props.location.search).pval)
        formData.append('description',this.Description.value)
              return  await Axios.post('http://react.vitruvio.ca/phpreact/makeorder.php', formData,{
            headers: {
                'content-type': 'multipart/form-data'
            }
        });

      }

 getPosts() {
   

      Axios.post('http://react.vitruvio.ca/phpreact/providerdata.php',{
            id:sessionStorage.getItem('userData'),
              pid:queryString.parse(this.props.location.search).pval,
         })
  
      .then(response => { 

        console.log(response);


        this.setState({
          posts: response.data.users,
          isLoading: false
        });
      })

     
      .catch(error => this.setState({ error, isLoading: false }));
  }

  // Let's our app know we're ready to render the data
  componentDidMount() {
    this.getPosts();
  }



    render() {

         if (sessionStorage.getItem('userData') >= 0 && sessionStorage.getItem('usertype') == 1  ){


}else {

return (<Redirect to={'/'}/>)

}
   

  const { isLoading, posts } = this.state;
    return (
      <React.Fragment>

        <div>
          {!isLoading ? (
            posts.map(post => {

                         // const { _id, title, content } = post;
                        

 const { cid, name, email,address,city,postcode,phone,proxy,fax ,about,what,description,type,freelimit,logo} = post;
                    
        
return (
        

     <form  onSubmit={this.makeorder}>       
            <div className="form-group col-6">
            
              <img src={logo} alt="profile image" className="img-responsive"/>

            </div>
 
                <div className="form-group col-6">
                <label>Provider Name: {name }</label>
                  </div>
                  <div className="form-group col-6">
                  <label>Address : {address}</label>
                  </div>
              <div className="form-group col-6">
                  <label>City : {city} </label>
                  </div>
              <div className="form-group col-6">
                  <label>Postcode : {postcode} </label>
                   </div>
                <div className="form-group col-6">
                <label>Phone : {phone} </label>
                </div>  
            <div className="form-group col-6">
            <label>Fax : {fax} </label>
              </div>
        <div className="form-group col-6">
        </div>   



            <div className="form-group col-6">
            <label>What does accessible healthcare mean to you? :  {about} </label>
            <label>How will you commit to making your service accessible : {what}</label>
            </div>
            <div className="form-group col-6">
            <label>I will provide 1 free prescription for every :{freelimit}</label>
            </div>

 

            <div className="form-group col-6">
            <label>Upload prescription</label>
           <input type="file" className="form-control " onChange={this.onChange} />

            <label> Description</label>
       
          <input type="text" className="form-control "  placeholder="Enter Description"  ref={(val)=>this.Description=val} />
            </div>

              

        &nbsp;&nbsp;  <button type="submit" className="btn btn-primary ">Order</button>&nbsp;
   
            </form>
    );
            })
          ) : (
            <p>Loading...</p>
          )}
        </div>
      </React.Fragment>
    );
  }
}
 
export default providerprofileview;