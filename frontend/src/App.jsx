import {BrowserRouter, Link, Route, Routes} from 'react-router-dom'
import Login from './pages/Login'
import Signup from './pages/Signup'

function App() {

  return (
    <>
      <BrowserRouter>
        <div className='m-4 text-end'>
          <Link to='/login' className='bg-sky-700 hover:bg-sky-600 text-slate-50 px-4 py-2 rounded mx-2'>Log in</Link>
          <Link to='/signup' className='bg-sky-700 hover:bg-sky-600 text-slate-50 px-4 py-2 rounded mx-2'>Sign up</Link>
        </div>
        <Routes>
          <Route path='/login' element={<Login />} />
          <Route path='/signup' element={<Signup />} />
        </Routes>
      </BrowserRouter>
    </>
  )
}

export default App
