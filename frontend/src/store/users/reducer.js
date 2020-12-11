import { GET_USERS_END } from './actionTypes';

const initialState = {
    users: []
}

export default (state = initialState, action) => {
    switch(action.type) {
        case GET_USERS_END: {
            return {
                users: { ...action.payload },
            };
        }
        default: {
            return state;
        }
    }
};
