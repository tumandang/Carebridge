window.addEventListener('DOMContentLoaded', () => {
    const statebtn = document.querySelector('#hs-dropdown-default')
    const statelist = document.querySelector('#list')

    statebtn.addEventListener('click',()=>{
        if(statelist.classList.contains('hidden')){
            statelist.classList.remove('hidden');
            statelist.classList.add('flex');
        }
        else{
            statelist.classList.remove('flex');
            statelist.classList.add('hidden');
        }
    })
  });



 