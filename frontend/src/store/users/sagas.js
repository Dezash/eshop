import { takeLatest, call, put } from 'redux-saga/effects';
import { getUsers } from './api';
import { GET_USERS } from './actionTypes';
import { getUsersEnd } from './actions';

export function* getUsersSaga(action) {
    try {
        const apiResult = yield call(getUsers, action.id);

        yield put(getUsersEnd(apiResult));
    } catch(e) {
        console.error(e);
    }
}

export default function* () {
    yield takeLatest(GET_USERS, getUsersSaga);
}
