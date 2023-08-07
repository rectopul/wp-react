import { combineReducers } from 'redux'
import {  CartReducer,  CommentReducer } from './cart/reducer'

const rootReducer = combineReducers({ CartReducer, CommentReducer })

export default rootReducer