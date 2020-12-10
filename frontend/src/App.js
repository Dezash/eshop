import './App.css';
import { Switch, Route } from 'react-router-dom';
import Login from './components/Auth/Login';
import SignUp from './components/Auth/SignUp';
import Recovery from './components/Auth/Recovery';
import Reset from './components/Auth/Reset';
import Users from './features/Users/Users';

function App() {
  return (
    <Switch>
      <Route path="/login" component={Login} />
      <Route path="/signup" component={SignUp} />
      <Route path="/forgot_password" component={Recovery} />
      <Route path="/reset_password" component={Reset} />
      <Route path="/users" component={Users} />
      <Route path="/:pageName" 
        render={(props) => <h1>{props.match.params.pageName}</h1> } />
      <Route exact path="/" render={() => <h1>Homepage</h1>} />
    </Switch>
  );
}

export default App;
