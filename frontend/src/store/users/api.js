import httpClient from '../../http/httpClient';

export const getUsers = () => httpClient.get('users');
