/**
 * Created by Jose Herrera on 13/06/2017.
 */

let couponOptions = {
    valueNames: [ 'name', 'city','type','expiration_date','discountTip','priceTip'],
    page: 3,
    pagination: true
};

let promotionOptions = {
    valueNames: [ 'title','description','priceTip2','original_price','saving','discountTip2'],
    page: 3,
    pagination: true
};

let couponList = new List('couponList', couponOptions);
let promotionList = new List('promotionList',promotionOptions);