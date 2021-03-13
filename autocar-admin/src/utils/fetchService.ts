import { HOST_URI } from './path';
import axios from 'axios';

export default async (url: string, method: string = 'GET', data: any | null = null, auth: string = '') => {
  const objectRequest: any = {
    method,
    url: `${HOST_URI}${url}`,
    data,
    headers: {
      'Content-Type': 'application/json',
      Accept: 'application/json'
    }
  }

  if (auth) objectRequest.headers['AuthorizationToken'] = `${auth}`;

  const response = await axios(objectRequest);
  const responseBody = response.data;

  return responseBody;
}
