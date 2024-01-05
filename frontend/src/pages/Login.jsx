import { useState } from 'react'
import { Link, useNavigate } from 'react-router-dom';
import { yupResolver } from '@hookform/resolvers/yup';
import * as yup from 'yup';
import { useForm } from 'react-hook-form';
import axios from 'axios';
import DangerAlert from '../components/DangerAlert';

const loginSchema = yup.object().shape({
  email: yup.string().email().required(),
  password: yup.string().required()
})

function Login({ setUser, setWorkspaces }) {

  // state to show the alert or not
  const [show, setShow] = useState(false);
  const navigateTo = useNavigate();
  
  const { register, handleSubmit, formState: { errors } } = useForm({
    resolver: yupResolver(loginSchema)
  });

  const handleLogin = async (data) => {
    const response = await axios.post("http://localhost/task-management/backend/handlers/api/auth.php", new URLSearchParams(data), {
      headers: "application/x-www-form-urlencoded"
    });

    if(response.data.user)
    {
      setUser(response.data.user);
      setWorkspaces(response.data.workspaces);
      navigateTo("/home");
    }
    else{
      setShow(true);
    }
  }

  return (
    <>
      <form onSubmit={handleSubmit(handleLogin)} className='m-auto mt-32 border border-gray-500 py-6 px-4 rounded flex flex-col flex-shrink-0 max-w-[400px] min-w-[300px]'>

        {show && <DangerAlert setShow={setShow} message="Incorrect Email or Password!" />}

        <h3 className='text-center text-2xl font-sans text-gray-200 my-3'>Welcome Back!</h3>

        <div className='py-3'>
          <input
            type="email"
            placeholder='E-Mail'
            className='block w-full border border-gray-500 bg-transparent text-gray-100 p-2 rounded'
            {...register("email")}
          />
          { errors.email?.message && <small className='text-red-500'>{ errors.email?.message }</small>}
        </div>

        <div className='py-3'>
          <input
            type="password"
            placeholder='Password'
            className='block w-full border border-gray-500 bg-transparent text-gray-100 p-2 rounded'
            {...register("password")}
          />
          {errors.password?.message && <small className='text-red-500'>{errors.password?.message}</small>}
        </div>

        <button className='bg-sky-600 hover:bg-sky-500 text-slate-50 my-3 p-2 rounded'>Log in</button>
      </form>
      <p className='text-center text-gray-300 mt-2'>
        No account yet!
        <Link to="/signup" className='text-center text-white hover:text-sky-400 ms-2'>Sign-up</Link>
      </p>
    </>
  )
}

export default Login
