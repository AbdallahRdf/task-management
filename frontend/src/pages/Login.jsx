import React, { useState } from 'react'

function Login() {
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");

  return (
    <form className='m-auto border py-6 px-4 rounded w-1/4 flex flex-col'>
      <h3 className='text-center text-2xl font-sans text-slate-500 my-3'>Welcome Back!</h3>
      <input 
        type="email" 
        placeholder='E-Mail' 
        className='border my-3 p-2 rounded'
        value={email} 
        onChange={e => setEmail(e.target.value)}
      />
      <input 
        type="password" 
        placeholder='Password' 
        className='border my-3 p-2 rounded'
        value={password} 
        onChange={e => setPassword(e.target.value)}
      />
      <button className='bg-sky-600 text-slate-50 my-3 p-2 rounded'>Log in</button>
    </form>
  )
}

export default Login
