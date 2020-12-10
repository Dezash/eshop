import React, { useState, useEffect } from 'react';
import { useDispatch, useSelector } from 'react-redux';
import { getUsers } from '../../store/users/actions';
import {
  UserList
} from '../../components';

export default () => {
    const dispatch = useDispatch();
    const userList = useSelector((state) => state.users.users);
  
    const [users, setUsers] = useState();
  
    useEffect(() => {
      dispatch(getUsers());
    }, [dispatch]);
  
    useEffect(() => {
      setUsers(userList || []);
    }, [userList]);
  
    return (
      <>
            <UserList users={users} />
      </>
    );
  };