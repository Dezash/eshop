import { all, fork } from 'redux-saga/effects';
import { sagas as usersSagas } from './users';

export default function* sagas() {
    yield all([
        fork(usersSagas),
    ])
}
