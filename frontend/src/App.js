import './App.css';
import { Switch, Route } from 'react-router-dom';
import Login from './components/Auth/Login';
import SignUp from './components/Auth/SignUp';
import Recovery from './components/Auth/Recovery';

function App() {
  return (
    <Switch>
      <Route path="/login" component={Login} />
      <Route path="/signup" component={SignUp} />
      <Route path="/forgot_password" component={Recovery} />
      <Route exact path="/" component={Login} />
    </Switch>
  );
}

export default App;
