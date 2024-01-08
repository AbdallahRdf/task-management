import axios from 'axios';
import React, { useEffect, useState } from 'react';

const Home = ({user}) => {

  console.log(user);
  const [workspaces, setWorkspaces] = useState(null);

  useEffect(() => {
    // (async () => {
    //   const workspacesAPI = "http://localhost/task-management/backend/handlers/api/workspaces.php";
    //   axios.get(workspacesAPI, {
    //     params: {
    //       userID: user["id"]
    //     }
    //   })
    // })();
  }, []);

  return (
    <div className='text-white'>
      hello
    </div>
  )
}

export default Home
