import './App.css'
import Wrapper from './components/Wrapper/Wrapper'
import { useState, useEffect } from 'react'
//import { ProductList } from './ProductList'

interface PropsProductAdd {
  id: number | null
  quantity: number | null
}

interface ProductClickProp {
  productAdd: PropsProductAdd | null
}


function App() {
  const [state, setState] = useState<string>(``)
  const [addProduct, setAddProduct] = useState<ProductClickProp | any>()

  const closeCart = (data: string | any) => {
    setState(data)
    document.body.style.overflow = data == `open` ? `hidden` : `initial`
    return state
  }

  const btnOpenCart: any = document.querySelector(`.card-stor`)

  if(btnOpenCart) {
    btnOpenCart.addEventListener('click', function (e: any) {
      e.preventDefault()
      document.body.style.overflow = `hidden`
      setState(`open`)
    });
  }

  useEffect(() => {
    const buttonsAddToCart = Array.from(document.querySelectorAll('.button_payment button'));

    const handleClick = (event: Event) => {
      event.preventDefault();
    }

    buttonsAddToCart.forEach((btn) => {
      btn.addEventListener('click', function (event) {
        event.preventDefault();

        const button = event.target as HTMLButtonElement;
        const id = button.getAttribute('data-product');
        setAddProduct({ id: id, quantity: 1 });
      });
    });

    // Retornar uma função de limpeza para remover os event listeners quando o componente for desmontado
    return () => {
      buttonsAddToCart.forEach((btn) => {
        btn.removeEventListener('click', handleClick);
      });
    };
  }, []);

  const existingClass = `cart-background ${state}`

  return (
    <>
      
      <div className={existingClass} onClick={closeCart}></div>
      <div className={`cart-summary ${state}`}>
        <Wrapper productAdd={addProduct} onChangeState={ closeCart }/>
      </div>
    </>
  )
}

export default App
