import { X } from 'lucide-react';

const DangerAlert = ({ setShow, message }) => {
  return (
    <div className='relative text-red-400 border border-red-400 bg-[#B91C1C30] rounded py-4 mb-2 text-center'>
        {message}
        <X
            className='absolute top-1 end-1 cursor-pointer'
            size={18}
            onClick={() => setShow(false)}
        />
    </div>
  )
}

export default DangerAlert
