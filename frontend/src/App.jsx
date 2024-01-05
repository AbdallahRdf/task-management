import {Link, Route, Routes, useHref} from 'react-router-dom'
import Login from './pages/Login'
import Signup from './pages/Signup'
import { useState } from 'react';

function App() {
  
  const [user, setUser] = useState(null);
  const [Workspaces, setWorkspaces] = useState(null);

  return (
    <>
      {
        (['/login', '/signup'].indexOf(useHref()) === -1) &&
        <div className='m-4 text-end'>
          <Link to='/login' className='bg-sky-600 hover:bg-sky-500 text-slate-50 px-4 py-2 rounded mx-2'>Log in</Link>
          <Link to='/signup' className='bg-sky-600 hover:bg-sky-500 text-slate-50 px-4 py-2 rounded mx-2'>Sign up</Link>
        </div>
      }
      <Routes>
        <Route path='/login' element={<Login setUser={setUser} setWorkspaces={setWorkspaces} />} />
        <Route path='/signup' element={<Signup setUser={setUser} />} />
      </Routes>
    </>
  )
}

export default App
