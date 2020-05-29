<?php


namespace DataLibrary;


use UserInterface\IdDocumentModel;

class IdDocumentProcessor
{
    public static function createIdDocument($userId, IdDocumentModel $documentModel)
    {
        $sql = 'INSERT INTO documents (userId, docType, docNumber, docSeries, issuerName, validDate)
                               values (?,?,?,?,?,?)';

        return SqlDataAccess::SaveData($sql, [
            $userId,
            $documentModel->getDocType(),
            $documentModel->getDocNumber(),
            $documentModel->getDocSeries(),
            $documentModel->getIssuerName(),
            $documentModel->getValidDate()]);
    }
}