import React, { useState } from 'react'
import { Link } from 'react-router-dom';

function Signup() {
  const [Username, setUername] = useState("");
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");
  const [passwordConfirm, setPasswordConfirm] = useState("");

  return (
    <>
      <form className='m-auto mt-24 border border-gray-500 py-6 px-4 rounded flex flex-col flex-shrink-0 max-w-[400px] min-w-[300px]'>
        <h3 className='text-center text-2xl font-sans text-gray-200 my-3'>Create An Account</h3>
        <input
          type="text"
          placeholder='Username'
          className='border border-gray-500 bg-transparent text-gray-100 my-3 p-2 rounded'
          value={Username}
          onChange={e => setUername(e.target.value)}
        />
        <input
          type="email"
          placeholder='E-Mail'
          className='border border-gray-500 bg-transparent text-gray-100 my-3 p-2 rounded'
          value={email}
          onChange={e => setEmail(e.target.value)}
        />
        <input
          type="password"
          placeholder='Password'
          className='border border-gray-500 bg-transparent text-gray-100 my-3 p-2 rounded'
          value={password}
          onChange={e => setPassword(e.target.value)}
        />
        <input
          type="password"
          placeholder='Confirm Password'
          className='border border-gray-500 bg-transparent text-gray-100 my-3 p-2 rounded'
          value={passwordConfirm}
          onChange={e => setPasswordConfirm(e.target.value)}
        />
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
