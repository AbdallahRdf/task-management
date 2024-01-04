import React, { useState } from 'react';
import { Link } from 'react-router-dom';
import { yupResolver } from '@hookform/resolvers/yup';
import * as yup from 'yup';
import { useForm } from 'react-hook-form';

const signupSchema = yup.object().shape({
  firstName: yup.string().required("Invalid First Name"),
  lastName: yup.string().required("Invalid Last Name"),
  email: yup.string().email().required("Invalid E-Mail"),
  password: yup.string().required().min(6),
  passwordConfirm: yup.string().required("Password must match").test("password-match", "Password must match", function (value) {return this.parent.password === value})
}).required();

function Signup() {

  const { register, handleSubmit, formState: { errors } } = useForm({
    resolver: yupResolver(signupSchema),
  });

  return (
    <>
      <form onSubmit={handleSubmit((d) => console.log(d))} className='m-auto mt-24 border border-gray-500 py-6 px-4 rounded flex flex-col flex-shrink-0 max-w-[400px] min-w-[300px]'>
        <h3 className='text-center text-2xl font-sans text-gray-200 my-3'>Create An Account</h3>
        
        <div className='py-3'>
          <input
            type="text"
            placeholder='First Name'
            className='block w-full border border-gray-500 bg-transparent text-gray-100 p-2 rounded'
            {...register('firstName')}
          />
          {errors.firstName?.message && <small className='text-red-500'>{errors.firstName?.message}</small>}
        </div>

        <div className='py-3'>
          <input
            type="text"
            placeholder='Last Name'
            className='block w-full border border-gray-500 bg-transparent text-gray-100 p-2 rounded'
            {...register('lastName')}
          />
          {errors.lastName?.message && <small className='text-red-500'>{errors.lastName?.message}</small>}
        </div>

        <div className='py-3'>
          <input
            type="email"
            placeholder='E-Mail'
            className='block w-full border border-gray-500 bg-transparent text-gray-100 p-2 rounded'
            {...register('email')}
          />
          {errors.email?.message && <small className='text-red-500'>{errors.email?.message}</small>}
        </div>

        <div className='py-3'>
          <input
            type="password"
            placeholder='Password'
            className='block w-full border border-gray-500 bg-transparent text-gray-100 p-2 rounded'
            {...register('password')}
          />
          {errors.password?.message && <small className='text-red-500'>{errors.password?.message}</small>}
        </div>

        <div className='py-3'>
          <input
            type="password"
            placeholder='Confirm Password'
            className='block w-full border border-gray-500 bg-transparent text-gray-100 p-2 rounded'
            {...register('passwordConfirm')}
          />
          {errors.passwordConfirm?.message && <small className='text-red-500'>{errors.passwordConfirm?.message}</small>}
        </div>

        <button className='bg-sky-600 hover:bg-sky-500 text-slate-50 my-3 p-2 rounded'>Sign up</button>
      </form>
      <p className='text-center text-gray-300 mt-2'>
        already have an account?
        <Link to="/login" className='text-center text-white hover:text-sky-400 ms-2'>Log-in</Link>
      </p>
    </>
  )
}

export default Signup