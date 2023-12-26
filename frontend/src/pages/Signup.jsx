import React from 'react'

function Signup() {
  return (
    <form className='m-auto border py-6 px-4 rounded w-1/4 flex flex-col'>
        <h3 className='text-center text-2xl font-sans text-slate-500 my-3'>Create An Account</h3>
        <input type="text" placeholder='Username' className='border my-3 p-2 rounded'/>
        <input type="email" placeholder='E-Mail' className='border my-3 p-2 rounded'/>
        <input type="password" placeholder='Password' className='border my-3 p-2 rounded'/>
        <input type="password" placeholder='Confirm Password' className='border my-3 p-2 rounded'/>
        <button className='bg-sky-600 text-slate-50 my-3 p-2 rounded'>Sign up</button>
    </form>
  )
}

export default Signup
