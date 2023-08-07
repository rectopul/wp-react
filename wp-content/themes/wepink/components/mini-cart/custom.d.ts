declare module 'woocommerce-api' {
  interface WooCommerceAPIOptions {
    url: string;
    consumerKey: string;
    consumerSecret: string;
    wpAPI?: boolean;
    version?: string;
    // Outras propriedades e tipos conforme necessário
  }

  export default class WooCommerceAPI {
    constructor(options: WooCommerceAPIOptions);

    get(endpoint: string, params?: Record<string, any>): Promise<any>;
    post(endpoint: string, data?: Record<string, any>): Promise<any>;
    put(endpoint: string, data?: Record<string, any>): Promise<any>;
    delete(endpoint: string, params?: Record<string, any>): Promise<any>;
    // Outros métodos conforme necessário
  }
}
declare namespace JSX {
  interface IntrinsicAttributes {
    'aria-selected'?: boolean | 'false' | 'true';
  }
}