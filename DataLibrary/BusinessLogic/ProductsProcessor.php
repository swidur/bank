<?php


namespace DataLibrary;


class ProductsProcessor
{
    public static function getUserAccountsByType($userId, $productType)
    {
        $sql = "select p.productname, a.aNumber, a.balance, a.availFunds
                from users u
                    join users_accounts ua on u.id = ua.userId
                    join accounts a on ua.accountId = a.id
                    join products p on a.productId = p.id
                    join producttypes pt on p.typeId = pt.id
                where
                u.id = ? and pt.category = 'ACCA' and pt.type like ?;";

        return SqlDataAccess::loadData($sql, [$userId, $productType], true);
    }

    public static function getUserAccountsBalanceByType($userId, $productType)
    {
        $sql = "select sum(a.balance)
                from users u
                    join users_accounts ua on u.id = ua.userId
                    join accounts a on ua.accountId = a.id
                    join products p on a.productId = p.id
                    join producttypes pt on p.typeId = pt.id
                where
                u.id = ? and pt.category = 'ACCA' and pt.type like ?;";

        return SqlDataAccess::loadData($sql, [$userId, $productType], true);
    }

    public static function getUserCardsByType($userId, $productType)
    {
        $sql = "select i.productname, i.cNumber, i.validThru, i.linkedAccNumber, p2.productName linkedAccName from
                (select p.productname,  c.cNumber, c.validThru, a.aNumber as 'linkedAccNumber', c.accountId
                from users u
                         join cards c on u.id = c.userId
                         join accounts a on a.id = c.accountId
                         join products p on c.productId = p.id
                         join producttypes pt on p.typeId = pt.id
                where
                        u.id = ? and pt.category = 'CARD' and pt.type like ?) as i
                join products p2 on p2.id = i.accountId";

        return SqlDataAccess::loadData($sql, [$userId, $productType], true);
    }

    public static function getUserLoansByType($userId, $productType)
    {
        $sql = "select p.productName, l.amount, l.interestRate, l.installments
                from users u
                    join users_loans ul on u.id = ul.userId
                    join loans l on ul.loanId = l.id
                    join products p on l.productId = p.id
                    join producttypes pt on p.typeId = pt.id
                where
                u.id = ? and pt.category = 'LOAN' and pt.type like ?;";

        return SqlDataAccess::loadData($sql, [$userId, $productType], true);
    }

    public static function getNumberOfTransactionsInBasket($userId)
    {
        $sql = "";

//        return SqlDataAccess::loadData($sql, [$userId], true);
        return 11;
    }

}
