import ReactDOM from 'react-dom/client'
// add the beginning of your app entry
import 'vite/modulepreload-polyfill'
import App from './App.tsx'
import './index.css'
import React from 'react'
import { Search } from './components/Search/Search.tsx'
import { Provider } from 'react-redux'
import store from './redux/store.tsx'
import { BuyField } from './components/BuyField/BuyField.tsx'
import { SingleProductPrice } from './components/Single/SingleProductPrice.tsx'
import { CommentApp } from './components/CommentForm/CommentApp.tsx'
import { ReviewRating } from './components/Single/Review/Review.tsx'

ReactDOM.createRoot(document.getElementById('cart-react') as HTMLElement).render(
//ReactDOM.createRoot(document.getElementById('root') as HTMLElement).render(
  <React.StrictMode>
    <Provider store={store}>
      <App />
    </Provider>
  </React.StrictMode>
  ,
)

ReactDOM.createRoot(document.getElementById('search-app') as HTMLElement).render(
  //ReactDOM.createRoot(document.getElementById('root') as HTMLElement).render(
    <React.StrictMode>
      <Search />
    </React.StrictMode>
    ,
)

const elementComment = document.getElementById('comment_form_single')

if(elementComment) {

  ReactDOM.createRoot(document.getElementById('buy_field') as HTMLElement).render(
    //ReactDOM.createRoot(document.getElementById('root') as HTMLElement).render(
      <React.StrictMode>
        <Provider store={store}>
          <BuyField />
        </Provider>
      </React.StrictMode>
      ,
  )
  
  ReactDOM.createRoot(document.getElementById('single_product_prices') as HTMLElement).render(
    //ReactDOM.createRoot(document.getElementById('root') as HTMLElement).render(
      <React.StrictMode>
        <Provider store={store}>
          <SingleProductPrice />
        </Provider>
      </React.StrictMode>
      ,
  )
  
  
  //Review Rating form
  ReactDOM.createRoot(document.getElementById('star-rating') as HTMLElement).render(
    //ReactDOM.createRoot(document.getElementById('root') as HTMLElement).render(
      <React.StrictMode>
        <Provider store={store}>
          <ReviewRating />
        </Provider>
      </React.StrictMode>
      ,
  )

  //Comment form
  ReactDOM.createRoot(document.getElementById('comment_form_single') as HTMLElement).render(
    //ReactDOM.createRoot(document.getElementById('root') as HTMLElement).render(
      <React.StrictMode>
        <Provider store={store}>
          <CommentApp />
        </Provider>
      </React.StrictMode>
      ,
  )
}
