import { createContext, useState } from 'react';

interface DataContextProps {
  data: any;
  setData: (newData: any) => void;
}

export const DataContext = createContext<DataContextProps>({
  data: '',
  setData: () => {},
});

export const DataProvider = ({ children }: any) => {
  const [data, setData] = useState('');

  return (
    <DataContext.Provider value={{ data, setData }}>
      {children}
    </DataContext.Provider>
  );
};