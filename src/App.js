import React, { Component } from 'react';
import { BrowserRouter, Route, Switch } from 'react-router-dom';
 
import Home from './components/Home';
import About from './components/About';
import Contact from './components/Contact';
import Error from './components/Error';
import Navigation from './components/Navigation';
import Patient from './components/Patients';
import Providers from './components/Providers';
import Register from './components/Register';
import PatientsDashboard from './components/PatientsDashboard';
import Patientsprofile from './components/Patientsprofile';
import 'bootstrap/dist/css/bootstrap.min.css';
import Customerorders from './components/Customerorders';
import Customerbooking from './components/Customerbooking';
import Customerbookservice from './components/Customerbookservice';
import Bookappointment from './components/Bookappointment';
import Providerdashboard from './components/Providerdashboard';
import Providerprofile from './components/Providerprofile';
import Providerteam from './components/Providerteam';
import Providerorder from './components/Providerorders';
import ProviderRegister from './components/ProviderRegister';
import Providersubscription from './components/Providersubscription';
import Providerview from './components/Providerview';
 
class App extends Component {
  render() {
    return (      
       <BrowserRouter>
        <div>
          <Navigation />
            <Switch>
             <Route path="/" component={Home} exact/>
             <Route path="/about" component={About}/>
             <Route path="/contact" component={Contact}/>
             <Route path="/patients" component={Patient}/>
             <Route path="/providers" component={Providers}/>
             <Route path="/register" component={Register}/>
             <Route path="/PatientsDashboard" component={PatientsDashboard}/>
             <Route path="/Patientsprofile" component={Patientsprofile}/>
             <Route path="/Customerorders" component={Customerorders}/>
             <Route path="/Customerbooking" component={Customerbooking}/>
             <Route path="/Customerbookservice" component={Customerbookservice}/>
             <Route path="/Booksappointment" component={Bookappointment}/>
             <Route path="/Providerdashboard" component={Providerdashboard}/>
             <Route path="/Providerprofile" component={Providerprofile}/>
             <Route path="/Providerteam" component={Providerteam}/>
             <Route path="/Providerorders" component={Providerorder}/>
             <Route path="/Providersubscription" component={Providersubscription}/>
             <Route path="/ProviderRegister" component={ProviderRegister}/>
             <Route path="/Providerview" component={Providerview}/>
            
             <Route component={Error}/>
            
           </Switch>
        </div> 
      </BrowserRouter>
    );
  }
}
 
export default App;

