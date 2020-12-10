import { GET_USERS, GET_USERS_END } from './actionTypes';

export const getUsers = () => ({ type: GET_USERS });

export const getUsersEnd = (users) => ({
    type: GET_USERS_END,
    payload: users,
});
