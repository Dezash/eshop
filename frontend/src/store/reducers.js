import { combineReducers } from 'redux';
import { reducer as users } from './users';

const reducers = combineReducers({
    users,
});

export default reducers;
